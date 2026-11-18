<?php

namespace Tests\Feature;

use Tests\TestCase;

class QuatreaPagesTest extends TestCase
{
    public function test_home_page_loads_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('QUATR');
        $response->assertSee('Fleur de l\'Aube', false);
        $response->assertSee('Soléaire', false);
        $response->assertSee('Ambre Noir', false);
        $response->assertSee('Nuit de Glace', false);
    }

    public function test_collection_page_loads_successfully(): void
    {
        $response = $this->get('/collection');
        $response->assertStatus(200);
        $response->assertSee('The Four');
        $response->assertSee('Seasons Collection', false);
        $response->assertSee('Soléaire', false);
    }

    public function test_all_four_product_pages_load_successfully(): void
    {
        $products = ['fleur-de-laube', 'solere', 'ambre-noir', 'nuit-de-glace'];

        foreach ($products as $slug) {
            $response = $this->get('/product/'.$slug);
            $response->assertStatus(200);
            $response->assertSee('Select Size');
            $response->assertSee('Add to Bag');
        }
    }

    public function test_our_story_page_loads_successfully(): void
    {
        $response = $this->get('/our-story');
        $response->assertStatus(200);
        $response->assertSee('Olfactory', false);
        $response->assertSee('Artistry', false);
        $response->assertSee('1927');
    }

    public function test_discover_notes_page_loads_successfully(): void
    {
        $response = $this->get('/discover-notes');
        $response->assertStatus(200);
        $response->assertSee('Discover');
        $response->assertSee('Notes', false);
        $response->assertSee('Fragrance Pyramid');
    }

    public function test_contact_page_loads_successfully(): void
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Place Vend', false);
        $response->assertSee('Inquiry', false);
    }

    public function test_shopping_bag_page_loads_successfully(): void
    {
        $response = $this->get('/bag');
        $response->assertStatus(200);
        $response->assertSee('Shopping Bag', false);
        $response->assertSee('Order Summary');
    }

    public function test_contact_form_submits_with_valid_data(): void
    {
        $response = $this->post('/contact/send', [
            'name' => 'Comtesse Hélène',
            'email' => 'helene@example.com',
            'subject' => 'Private Fragrance Consultation',
            'message' => 'I would like to reserve a private salon session in Paris next week.',
        ]);

        $response->assertSessionHas('success');
        $response->assertStatus(302);
    }

    public function test_newsletter_submits_with_valid_data(): void
    {
        $response = $this->post('/newsletter', [
            'email' => 'connoisseur@luxury.fr',
        ]);

        $response->assertSessionHas('newsletter_success');
        $response->assertStatus(302);
    }
}
