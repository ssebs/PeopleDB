$peoplecsv = Import-Csv C:\PeopleDB\users\people.csv

foreach ($person in $peoplecsv) {
    $username = $person.User
    $first = $person.First
    $last = $person.Last
    $email = $person.Email
    $name = "$first $last"

    $user = Get-ADUser -LDAPFilter "(sAMAccountName=$username)" -Properties EmailAddress,DisplayName

    If($user -ne $Null) {
        echo "User: $username alreaady created."

        If($user.Surname -eq $last -and $user.GivenName -eq $first -and $user.EmailAddress `
            -eq $email -and $user.DisplayName -eq $name) 
        {
            echo " "
        }Else 
        {
            echo "Updating user: $username"
            Set-ADUser -Identity $user `
                       -DisplayName $name `
                       -Surname $last `
                       -GivenName $first `
                       -SamAccountName "$username" `
                       -UserPrincipalName "$email" `
                       -EmailAddress $email
        }

    }Else {
        echo "Creating account for $username"
        
        $passwd = (ConvertTo-SecureString "SsebsP@ss" -AsPlainText -Force)

         New-ADUser -Name "$username" `
                    -DisplayName $name `
                    -Surname $last `
                    -GivenName $first `
                    -SamAccountName "$username" `
                    -UserPrincipalName "$email" `
                    -AccountPassword $passwd `
                    -Path "OU=ssebs Users,DC=ssebs,DC=net" `
                    -EmailAddress $email `
                    -PassThru | Enable-ADAccount 

    }
    
}