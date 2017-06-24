$peoplecsv = Import-Csv C:\PeopleDB\users\people.csv

foreach ($person in $peoplecsv) {
    $username = $person.User
    $first = $person.First
    $last = $person.Last
    $email = $person.Email
    $name = "$first $last"

    $user = Get-ADUser -LDAPFilter "(sAMAccountName=$username)"

    If($user -ne $Null) {
        echo "User: $username alreaady created"
        continue;
    }Else {
        echo "Creating account for $username"
        
        $passwd = (ConvertTo-SecureString "SsebsP@ss" -AsPlainText -Force)

         New-ADUser  -Name "$name" `
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