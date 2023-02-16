<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class CandidateControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_data()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiZmRiZTgxNTgyY2I4Y2RhNmZmMTRkNDQ4YmNkOWZkYzhjZjgxNmYxMTlmZjcxNWM1OTM5NzRjMTA2MGM3N2Q4YjBmYjQ4NTAzYTY5NjlhNDYiLCJpYXQiOjE2NzY1NzMxODMuNzQ3NDc4LCJuYmYiOjE2NzY1NzMxODMuNzQ3NDgxLCJleHAiOjE3MDgxMDkxODMuMTA2MTY4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UUpKDKvXEOpn0gA3nISKe3h4_lBpWpiE_XsWXUKWJWhETxECoqAKdM0S4-LrI2UpQ-gMtGcZyjMAEi1sYcnBPhxWshsGK5A6MpzkmkE4Ff9OA5Ob5fHU4hfKeyUC9u8FWZaI3GW2CGSlv_oYlEPeOXCS_r2_J37oP3ZqFLhswxpw9u9IfzXT-t_ualUvmiPf5QjV6iZ2oGRfyxLL7f3eUgIyRMaljwfDNgzl61GEirSGMqP5zJJ34-L5DYuX2FIAOqPAPxTFJ_D11YeOG6hsECQR8j6LxiljJjO1QuTo-w3xb4yVY8MkGMC-GWyZHqk-UtbIhfAEUZo1fhMVA7V-kv4yQJsteBCoTJm3wm3OgSqDVr39YyNX_umxH0klDWQHgPC166iH0SzPmpQbPmuQwslmgpoM9uV_0ApR6UIF8eOXQrSqXKZnJD_eHcIIRzAxV1Hdz5eCFwdIYAXlTACuLSHKN1Ho4t_2YR8zlQhCUQfoyhVPbfc6cbHJmJKhO_5TLFHu4Eqgkbuz1rqOG5pQ0ejwbGy_aLYmojfuHL9dtkF29KhT93528NJkkXMnLCsNNznUOQ_CD7yDesmKhUgORO0d8BwK_xa53gI5r5JO-fgWlV20o1TGQbMPqWw8Ol5k7xHdC2S8L4uec7d52n6xxyePskxuIyWxupQX5OvwZos';
        $response = $this->get('/api/candidate',
        ['Authorization' => 'Bearer ' . $token]);
        $response->assertStatus(200);
       
    }
    public function test_delete_data()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiZmRiZTgxNTgyY2I4Y2RhNmZmMTRkNDQ4YmNkOWZkYzhjZjgxNmYxMTlmZjcxNWM1OTM5NzRjMTA2MGM3N2Q4YjBmYjQ4NTAzYTY5NjlhNDYiLCJpYXQiOjE2NzY1NzMxODMuNzQ3NDc4LCJuYmYiOjE2NzY1NzMxODMuNzQ3NDgxLCJleHAiOjE3MDgxMDkxODMuMTA2MTY4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UUpKDKvXEOpn0gA3nISKe3h4_lBpWpiE_XsWXUKWJWhETxECoqAKdM0S4-LrI2UpQ-gMtGcZyjMAEi1sYcnBPhxWshsGK5A6MpzkmkE4Ff9OA5Ob5fHU4hfKeyUC9u8FWZaI3GW2CGSlv_oYlEPeOXCS_r2_J37oP3ZqFLhswxpw9u9IfzXT-t_ualUvmiPf5QjV6iZ2oGRfyxLL7f3eUgIyRMaljwfDNgzl61GEirSGMqP5zJJ34-L5DYuX2FIAOqPAPxTFJ_D11YeOG6hsECQR8j6LxiljJjO1QuTo-w3xb4yVY8MkGMC-GWyZHqk-UtbIhfAEUZo1fhMVA7V-kv4yQJsteBCoTJm3wm3OgSqDVr39YyNX_umxH0klDWQHgPC166iH0SzPmpQbPmuQwslmgpoM9uV_0ApR6UIF8eOXQrSqXKZnJD_eHcIIRzAxV1Hdz5eCFwdIYAXlTACuLSHKN1Ho4t_2YR8zlQhCUQfoyhVPbfc6cbHJmJKhO_5TLFHu4Eqgkbuz1rqOG5pQ0ejwbGy_aLYmojfuHL9dtkF29KhT93528NJkkXMnLCsNNznUOQ_CD7yDesmKhUgORO0d8BwK_xa53gI5r5JO-fgWlV20o1TGQbMPqWw8Ol5k7xHdC2S8L4uec7d52n6xxyePskxuIyWxupQX5OvwZos';
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->delete('/api/candidate/17');
        $response->assertStatus(200)
                 ->assertSessionHasNoErrors();
    }


    public function test_input_data()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiZmRiZTgxNTgyY2I4Y2RhNmZmMTRkNDQ4YmNkOWZkYzhjZjgxNmYxMTlmZjcxNWM1OTM5NzRjMTA2MGM3N2Q4YjBmYjQ4NTAzYTY5NjlhNDYiLCJpYXQiOjE2NzY1NzMxODMuNzQ3NDc4LCJuYmYiOjE2NzY1NzMxODMuNzQ3NDgxLCJleHAiOjE3MDgxMDkxODMuMTA2MTY4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UUpKDKvXEOpn0gA3nISKe3h4_lBpWpiE_XsWXUKWJWhETxECoqAKdM0S4-LrI2UpQ-gMtGcZyjMAEi1sYcnBPhxWshsGK5A6MpzkmkE4Ff9OA5Ob5fHU4hfKeyUC9u8FWZaI3GW2CGSlv_oYlEPeOXCS_r2_J37oP3ZqFLhswxpw9u9IfzXT-t_ualUvmiPf5QjV6iZ2oGRfyxLL7f3eUgIyRMaljwfDNgzl61GEirSGMqP5zJJ34-L5DYuX2FIAOqPAPxTFJ_D11YeOG6hsECQR8j6LxiljJjO1QuTo-w3xb4yVY8MkGMC-GWyZHqk-UtbIhfAEUZo1fhMVA7V-kv4yQJsteBCoTJm3wm3OgSqDVr39YyNX_umxH0klDWQHgPC166iH0SzPmpQbPmuQwslmgpoM9uV_0ApR6UIF8eOXQrSqXKZnJD_eHcIIRzAxV1Hdz5eCFwdIYAXlTACuLSHKN1Ho4t_2YR8zlQhCUQfoyhVPbfc6cbHJmJKhO_5TLFHu4Eqgkbuz1rqOG5pQ0ejwbGy_aLYmojfuHL9dtkF29KhT93528NJkkXMnLCsNNznUOQ_CD7yDesmKhUgORO0d8BwK_xa53gI5r5JO-fgWlV20o1TGQbMPqWw8Ol5k7xHdC2S8L4uec7d52n6xxyePskxuIyWxupQX5OvwZos';
        $data = [
            'name' => 'John Doe 2',
            'education' => 'Koelpin, Walker and Spencer',
            'birthday' => '1991-05-28',
            'experience' => '0',
            'last_position' => 'Rowe',
            'applied_position' => 'Unique',
            'skills' => 'IT',
            'email' => 'hrd32@example.ne',
            'phone' => '643-669-8882x346',
            'resume' => UploadedFile::fake()->create('resume.pdf', 100),
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/api/candidate/' ,$data);
        $response->assertStatus(200)
                 ->assertSessionHasNoErrors();
    }


    public function test_update_data()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI1IiwianRpIjoiZmRiZTgxNTgyY2I4Y2RhNmZmMTRkNDQ4YmNkOWZkYzhjZjgxNmYxMTlmZjcxNWM1OTM5NzRjMTA2MGM3N2Q4YjBmYjQ4NTAzYTY5NjlhNDYiLCJpYXQiOjE2NzY1NzMxODMuNzQ3NDc4LCJuYmYiOjE2NzY1NzMxODMuNzQ3NDgxLCJleHAiOjE3MDgxMDkxODMuMTA2MTY4LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UUpKDKvXEOpn0gA3nISKe3h4_lBpWpiE_XsWXUKWJWhETxECoqAKdM0S4-LrI2UpQ-gMtGcZyjMAEi1sYcnBPhxWshsGK5A6MpzkmkE4Ff9OA5Ob5fHU4hfKeyUC9u8FWZaI3GW2CGSlv_oYlEPeOXCS_r2_J37oP3ZqFLhswxpw9u9IfzXT-t_ualUvmiPf5QjV6iZ2oGRfyxLL7f3eUgIyRMaljwfDNgzl61GEirSGMqP5zJJ34-L5DYuX2FIAOqPAPxTFJ_D11YeOG6hsECQR8j6LxiljJjO1QuTo-w3xb4yVY8MkGMC-GWyZHqk-UtbIhfAEUZo1fhMVA7V-kv4yQJsteBCoTJm3wm3OgSqDVr39YyNX_umxH0klDWQHgPC166iH0SzPmpQbPmuQwslmgpoM9uV_0ApR6UIF8eOXQrSqXKZnJD_eHcIIRzAxV1Hdz5eCFwdIYAXlTACuLSHKN1Ho4t_2YR8zlQhCUQfoyhVPbfc6cbHJmJKhO_5TLFHu4Eqgkbuz1rqOG5pQ0ejwbGy_aLYmojfuHL9dtkF29KhT93528NJkkXMnLCsNNznUOQ_CD7yDesmKhUgORO0d8BwK_xa53gI5r5JO-fgWlV20o1TGQbMPqWw8Ol5k7xHdC2S8L4uec7d52n6xxyePskxuIyWxupQX5OvwZos';
        $data = [
            'name' => 'John Doe 2',
            'education' => 'Koelpin, Walker and Spencer',
            'birthday' => '1991-05-28',
            'experience' => '0',
            'last_position' => 'Rowe',
            'applied_position' => 'Unique',
            'skills' => 'IT',
            'email' => 'hrd32@example.ne',
            'phone' => '643-669-8882x346',
            'resume' => UploadedFile::fake()->create('resume.pdf', 100),
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('/api/candidate/17?_method=PUT' ,$data);
        $response->assertStatus(200)
                 ->assertSessionHasNoErrors();
    }

}
