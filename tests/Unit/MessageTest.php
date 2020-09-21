<?php

namespace Tests\Unit;

use Tests\TestCase;

class MessageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStoreTest()
    {
        $messages = $this->messages();

        foreach ($messages['success'] as $message) {
            $response = $this->post('/messages/store', $message);

            $response->assertStatus(200)->assertJson([
                'created' => true,
            ]);
        }

        foreach ($messages['fail'] as $message) {
            $response = $this->post('/messages/store', $message);
            $response->assertStatus(302);
        }
    }

    public function messages()
    {

        return [
            'success' => [
                [
                    'name' => 'Sally',
                    'email' => 'sally@example.com',
                    'message' => 'lorem ipsum',
                    'phone' => '5172825135',
                ],
                [
                    'name' => 'Bill Boberson',
                    'email' => 'roger@example',
                    'message' => 'woot',
                    'phone' => '5178675309',
                ],
            ],

            'fail' => [
                [],
                [
                    'name' => 'Bill Williams',
                ],
                [
                    'name' => 'Bill Boberson',
                    'email' => 'roger@example',
                    'message' => '',
                ],
                [
                    'name' => 'Bill Boberson',
                    'email' => 'roger@example',
                    'message' => 'woot',
                    'phone' => '8675309',
                ],
            ],
        ];
    }
}
