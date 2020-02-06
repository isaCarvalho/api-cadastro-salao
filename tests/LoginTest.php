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
        $funcionario = factory('App\Funcionario')->create([
            'name' => 'Isabela Carvalho',
            'email' => 'isabelasc@id.uff.br',
            'password' => '123456'
        ]);

        $this->actingAs($funcionario)->post('/login', [
            'email' => $funcionario->email,
            'senha' => $funcionario->password
        ]);

        $this->assertEquals(
            200, $this->response->status()
        );
    }
}
