<?php

namespace Tests\Feature\Livewire\Components\Schools;

use App\Livewire\Components\Campus\FollowCampusButton;
use App\Models\Campus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class FollowSchoolButtonTest extends TestCase {

    use RefreshDatabase;

    protected function setUp(): void {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->seed();
    }

    /** @test */
    public function renders_successfully()
    {
        Livewire::test(FollowCampusButton::class)
            ->assertStatus(200);
    }

    /** @test */
    public function dispatches_followed_campuses_updated_on_follow(){

        $testCampus = Campus::query()->first();

        Livewire::actingAs( $testCampus->school->users->first() );

        Livewire::test(FollowCampusButton::class, $testCampus )

            ->call('follow' )
            ->assertDispatched('followed_campuses_updated');

        $this->assertDatabaseHas( 'campus_followers', [
            'campus_id' => $testCampus->id,
            'user_id' => 1,
            'type' => 'OPEN'
        ] );
    }

}