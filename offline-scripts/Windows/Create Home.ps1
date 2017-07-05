$username = Read-Host "Enter Username to create a home dir for"
$user = Get-ADUser -LDAPFilter "(sAMAccountName=$username)"
$userhome = New-Item -Name $username -ItemType Directory -Path "\\ssebs-share\home"

$acl = Get-Acl -Path $userhome.FullName
$acl.SetAccessRuleProtection($true,$true)

$perm = $username, 'Modify', 'ContainerInherit, ObjectInherit', 'None', 'Allow'
$ace = New-Object Security.AccessControl.FileSystemAccessRule $perm

$acl.SetAccessRule($ace)
$acl | Set-Acl -Path $userhome.FullName

Import-Module ActiveDirectory
Set-ADUser $username -HomeDirectory $userhome.FullName -HomeDrive 'T:'