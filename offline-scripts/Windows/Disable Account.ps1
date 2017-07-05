Import-Module ActiveDirectory
Read-Host "Enter the username to disable: " $username
Get-ADUser -Filter {sAMAccountName -eq $username}
