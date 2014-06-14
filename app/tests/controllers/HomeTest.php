<?php
    class HomeTest extends TestCase
    {
        public function testLoginFormShows()
        {
            $this->call('GET', 'login');
            $this->assertResponseOk();
        }

        public function testSubmitLoginSuccess()
        {
            $this->call('POST', 'login', array(
                'email' => 'david@spookstudio.com',
                'password' => 'password'
            ));

            $this->assertRedirectedTo('message');
        }

        public function testSubmitLoginFail()
        {
            $this->call('POST', 'login', array(
                'email' => 'noone@spookstudio.com',
                'password' => 'password'
            ));

            $this->assertRedirectedTo('login');
        }

        public function testLogout()
        {
            $this->call('GET', 'logout');

            $this->assertRedirectedTo('/');
        }

    }