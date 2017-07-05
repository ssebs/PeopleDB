$peoplecsv = Import-Csv C:\PeopleDB\users\people.csv

foreach ($person in $peoplecsv) {
    $uid = $person.uIDs
    $username = $person.User
    $first = $person.First
    $last = $person.Last
    $email = $person.Email
    $name = "$first $last"
    $disabled = $person.Disabled
    $enabled = 1-$disabled

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
                       -Enabled $enabled `
                       -EmailAddress $email
            if($enabled -eq 0) {
                echo "$username has been disabled"
            }   
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
                    -OtherAttributes @{'uid'=$uid}  `
                    -PassThru | Enable-ADAccount 

        $userhome = New-Item -Name $username -ItemType Directory -Path "\\ssebs-share\home"

        $acl = Get-Acl -Path $userhome.FullName
        $acl.SetAccessRuleProtection($true,$true)

        $perm = $username, 'Modify', 'ContainerInherit, ObjectInherit', 'None', 'Allow'
        $ace = New-Object Security.AccessControl.FileSystemAccessRule $perm

        $acl.SetAccessRule($ace)
        $acl | Set-Acl -Path $userhome.FullName

        Set-ADUser $username -HomeDirectory $userhome.FullName -HomeDrive 'T:'

    }
    
}