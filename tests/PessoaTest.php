<?php

class PessoaTest extends TestCase
{
    public function testGetPessoas()
    {
        $this->get('/pessoas');

        $this->assertEquals(200, $this->response->status());
    }

    public function testGetPessoasById()
    {
        $this->get('/pessoa/1');

        $this->assertEquals(200, $this->response->status());
    }
}