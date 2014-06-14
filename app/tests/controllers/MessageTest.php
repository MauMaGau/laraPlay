<?php
    class MessageTest extends TestCase
    {
        public function testList()
        {
            // $this->be(User::find(1));
            $this->call('GET', 'message');
            $this->assertResponseOk();
        }
    }