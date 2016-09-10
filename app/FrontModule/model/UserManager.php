<?php

namespace App\Model;

use Nette,
	Nette\Utils\Strings,
	Nette\Security\Passwords;


/**
 * Users management.
 */
class UserManager extends Nette\Object implements Nette\Security\IAuthenticator
{
	const
		TABLE_NAME = 'user',
		COLUMN_ID = 'id',
		COLUMN_NAME = 'email',
		COLUMN_PASSWORD_HASH = 'password',
		COLUMN_ROLE = 'role';


	/** @var Nette\Database\Context */
	private $database;


	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}


	/**
	 * Performs an authentication.
	 * @return Nette\Security\Identity
	 * @throws Nette\Security\AuthenticationException
	 */
	public function authenticate(array $credentials)
	{
	
		list($username, $password) = $credentials;


		$row = $this->database->table(self::TABLE_NAME)->where(self::COLUMN_NAME, $username)->fetch();

		if (!$row) 
		{
			throw new Nette\Security\AuthenticationException('Email nebyl nalezen', self::IDENTITY_NOT_FOUND);

		} 

		elseif ($row["role"] == "guest")
		{
			throw new Nette\Security\AuthenticationException('Váš učet není aktivní, aktivujete jej přes aktivační odkaz v emailu, který jsme vám zaslali.', self::NOT_APPROVED);
		}
		elseif (!Passwords::verify($password, $row[self::COLUMN_PASSWORD_HASH])) 
		{
			throw new Nette\Security\AuthenticationException('Zadané heslo je špatně', self::INVALID_CREDENTIAL);

		} 
		elseif (Passwords::needsRehash($row[self::COLUMN_PASSWORD_HASH])) 
		{
			

			$row->update(array(
				self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
			));
		}


		$row->update(array("last_login" => new \DateTime));

		$arr = $row->toArray();
		unset($arr[self::COLUMN_PASSWORD_HASH]);
		return new Nette\Security\Identity($row[self::COLUMN_ID], $row[self::COLUMN_ROLE], $arr);
	}


	/**
	 * Adds new user.
	 * @param  string
	 * @param  string
	 * @return void
	 */
	public function add($username, $password)
	{
		$this->database->table(self::TABLE_NAME)->insert(array(
			self::COLUMN_NAME => $username,
			self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
		));
	}

}
