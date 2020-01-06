<?php

class LoginTest extends TestCase
{
    /**
     * Login teste
     *
     * @return void
     */
    public function testLogin()
    {
        $this->post('/login', [
            'email' => 'isabelasc@id.uff.br',
            'senha' => '123456'
        ]);

        $this->assertEquals(
            200, $this->response->status()
        );
    }
}
