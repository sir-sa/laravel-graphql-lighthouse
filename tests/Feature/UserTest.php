<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\CreatesApplication;
use Nuwave\Lighthouse\Testing\RefreshesSchemaCache;

abstract class UserTest extends TestCase
{
    use CreatesApplication;
    use RefreshesSchemaCache;

    protected function setUp(): void
    {
        parent::setUp();
       $this->bootRefreshesSchemaCache();
    }

    public function testCreateUser()
{
    $response = $this->graphQL(/** @lang GraphQL */ '
        mutation register{
            register(
              input: { name: "sammy", email: "sam@test.com", password: "password" }
            ) {
              id
              name
            }
          }
    ');

    return $response;


  }

  public function testLogin(){
      $response= $this->graphQL('
        mutation login{
            login(input: { email: "test@test.com", password: "password" }) {
            id
            email
            name
            }
        }
      ');

      return $response;
  }


  public function testLogout(){
      $response =$this->graphQL('
        mutation logout {
            logout {
            id
            email
            }
        }
      ');

      return $response;
  }

  public function testQueryUser(){
      $response =$this->graphQL('
        query user {
            me {
            id
            email
            }

            vehicles {
            id
            reg_no
            type
            tonnage
            manufacture_year
        }
        }
      ');

      return $response;
  }

  public function testCreateVehicle(){
      $response =$this->graphQL('
        registerVehicle(input: {
            reg_no: "KCS 125"
            type:"truck"
            manufacture_year: "2020"
            tonnage:"5.0"
        }){
            reg_no
            manufacture_year
        }
      ');

      return $response;
  }
  public function testUpdateVehicle(){
      $response =$this->graphQL('
        updateVehicle(id:1, input: {
            type: "Semi-Truck"
            tonnage: "6.0"
        }){
            id
            reg_no
            tonnage
        }
      ');

      return $response;
  }
  public function testDeleteVehicle(){
      $response =$this->graphQL('
        deleteVehicle(id:1) {
            id
            reg_no
            type
            manufacture_type
            tonnage
        }
      ');

      return $response;
  }

}


