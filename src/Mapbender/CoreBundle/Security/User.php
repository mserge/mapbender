<?php

namespace Mapbender\CoreBundle\Security;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Generic user class.
 *
 * @author Christian Wygoda <christian.wygoda@wheregroup.com>
 */
class User implements UserInterface {
	protected $username;
	protected $password;
    protected $email;
    protected $realname;

	public function __construct($username, $password, $email, $realname) {
                $this->username = $username;
                $this->password = $password;
                $this->email = $email;
                $this->realname = $realname;
        }

        public function getRoles() {
                return array('ROLE_USER');
        }

        public function getPassword() {
                return $this->password;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getRealname() {
            return $this->realname;
        }

        public function getSalt() {
                return '';
        }

        public function getUsername() {
                return $this->username;
        }

        public function eraseCredentials() {
                $this->password = null;
        }

        public function equals(UserInterface $user) {
                if(!$user instanceof User) {
                        return false;
                }
                return $this->getUsername() === $user->getUsername();
        }
}
