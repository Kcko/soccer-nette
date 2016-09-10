<?php

namespace App;


use Nette,
Nette\Security\Permission;

class AclFactory
{
    /**
     * @return Nette\Security\IAuthorizator
     */	
	public function createAcl()
	{

	    $permission = new Permission();

        /* seznam uživatelských rolí */
        $permission->addRole('guest');
        $permission->addRole('user');
        $permission->addRole('admin', 'user');

        /* seznam zdrojů */
        $permission->addResource('Admin:Reference');
        $permission->addResource('Admin:Blog');
        $permission->addResource('Admin:Gallery');

        /* seznam pravidel oprávnění */
        $permission->allow('user', array('Admin:Reference'), array('default', 'edit', 'add', 'delete'));
        $permission->allow('user', array('Admin:Blog'), array('default', 'edit', 'add', 'delete'));
        $permission->allow('user', array('Admin:Gallery'), array('default', 'edit', 'add', 'delete', 'upload', 'photos'));
        

        # admin má práva na všechno
        //$permission->allow('admin', $permission::ALL, $permission::ALL);

        return $permission;
	}

}
