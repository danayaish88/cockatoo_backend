<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
        //  \App\Models\Restaurant::factory(100)->create();
         \App\Models\Cuisine::factory(5)->create();
         \App\Models\Culture::factory(4)->create();
         \App\Models\Entertainment::factory(100)->create();
         \App\Models\Nature::factory(4)->create();
         \App\Models\Place::factory(100)->create();
         \App\Models\Sight::factory(100)->create();
         \App\Models\Sight::factory(100)->create();

        ///////////////////////////////////////////////////////////////////
         /*
         BOOKMARKS
         */

         //restaurant_user pivot table
         
         /*$restaurants = \App\Models\Restaurant::all();
         \App\Models\User::all()->each(function ($user) use ($restaurants) { 
            $user->restaurants()->attach(
                $restaurants->random(rand(1, 3))->pluck('id')->toArray()
            ); 
        });*/

        //sight_user pivot table
        $sights = \App\Models\Sight::all();
        \App\Models\User::all()->each(function ($user) use ($sights) { 
           $user->sights()->attach(
               $sights->random(rand(1, 3))->pluck('id')->toArray()
           ); 
       });

       //entertainment_user pivot table
       $entertainments = \App\Models\Entertainment::all();
       \App\Models\User::all()->each(function ($user) use ($entertainments) { 
          $user->entertainments()->attach(
              $entertainments->random(rand(1, 3))->pluck('id')->toArray()
          ); 
      });

      ///////////////////////////////////////////////////////////////////
      /*
      INTERESTS
      */

      //culture_user pivot table
      $cultures = \App\Models\Culture::all();
      \App\Models\User::all()->each(function ($user) use ($cultures) { 
         $user->cultures()->attach(
             $cultures->random(rand(1, 3))->pluck('name')->toArray()
         ); 
     });

     //cuisine_user pivot table
     $cuisines = \App\Models\Cuisine::all();
     \App\Models\User::all()->each(function ($user) use ($cuisines) { 
        $user->cuisines()->attach(
            $cuisines->random(rand(1, 3))->pluck('name')->toArray()
        ); 
    });

    //nature_user pivot table
    $natures = \App\Models\Nature::all();
    \App\Models\User::all()->each(function ($user) use ($natures) { 
       $user->natures()->attach(
           $natures->random(rand(1, 3))->pluck('name')->toArray()
       ); 
   });

   /*
   /////////////////////////////////////////////////////////////////////
   */

   //culture_sight pivot table
   $cultures = \App\Models\Culture::all();
   \App\Models\Sight::all()->each(function ($sight) use ($cultures) { 
      $sight->cultures()->attach(
          $cultures->random(rand(1, $cultures->count()))->pluck('name')->toArray()
      ); 
  });

  //nature_sight pivot table
  $natures = \App\Models\Nature::all();
   \App\Models\Sight::all()->each(function ($sight) use ($natures) { 
      $sight->natures()->attach(
          $natures->random(rand(1, 4))->pluck('name')->toArray()
      ); 
  });

  $cuisines = \App\Models\Cuisine::all();
   \App\Models\Restaurant::all()->each(function ($restaurant) use ($cuisines) { 
      $restaurant->cuisines()->attach(
          $cuisines->random(rand(1, 5))->pluck('name')->toArray()
      ); 
  });















    }
}
