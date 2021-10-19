<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FormTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_feedback_form()
    {
        $response = $this->get(route('account.feedback'));

        $response->assertStatus(200);
    }

    public function test_show_feedback_form_submit()
    {
        $name = "Test";
        $feedback = "Same Feedback";
        $response = $this->post(route('account.feedback.store', ['name' => $name, 'feedback' => $feedback]));
        $response->assertStatus(302);
    }

    public function test_show_feedback_form_long_name()
    {
        $name = "This name is long";
        $feedback = "Same Feedback";
        $response = $this->post(route('account.feedback.store', ['name' => $name, 'feedback' => $feedback]));
        $response->assertSessionHasErrors(['name']);
    }

    public function test_show_feedback_form_empty_feedback()
    {
        $response = $this->post(route('account.feedback.store', ['name' => 'test', 'feedback' => null]));
        $response->assertSessionHasErrors(['feedback']);
    }

    public function test_show_order_form()
    {
        $response = $this->get(route('account.order'));

        $response->assertStatus(200);
    }

    public function test_show_order_form_not_numeric_phone()
    {
        $name = "This";
        $phone = "word";
        $email = "test@test.com";
        $info = "Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed";
        $response = $this->post(route('account.order.save', [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'info' => $info
        ]));
        $response->assertSessionHasErrors(['phone']);
    }

    public function test_show_order_form_min_info()
    {
        $name = "This name is long";
        $phone = "1234";
        $email = "test@test.com";
        $info = str_repeat("1", 2);
        $response = $this->post(route('account.order.save', ['name' => $name, 'phone' => $phone, 'email' => $email, 'info' => $info]));
        $response->assertSessionHasErrors([
            'info' => 'The info must be at least 5 characters.'
        ]);
    }
}
