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
            $response = $this->post('/api/messages/store', $message);

            $response->assertStatus(200)->assertJson([
                'created' => true,
            ]);
        }

        foreach ($messages['fail'] as $message) {
            $response = $this->post('/api/messages/store', $message);
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
                    'phone' => '5172223333',
                ],
                [
                    'name' => 'Linda Richman',
                    'email' => 'linda@coffee-talk.chat',
                    'message' => 'woot',
                    'phone' => '212-555-4444',
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
                    'email' => 'roger@example.com',
                    'message' => 'woot',
                    'phone' => '8675309',
                ],
            ],
        ];
    }
}
