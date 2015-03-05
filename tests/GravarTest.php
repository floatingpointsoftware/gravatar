<?php
namespace Tests;

use FloatingPoint\Gravatar\Gravatar;
use Mockery as m;

class GravarTest extends TestCase
{
    public function testSrcGeneration()
    {
        // Setup
        $api = m::spy('thomaswelton\GravatarLib\Gravatar');
        $gravatar = new Gravatar($api);

        // Act
        $gravatar->src('myemail@google.com');

        // Assert
        $api->shouldHaveReceived('setAvatarSize')->with(100)->once();
        $api->shouldHaveReceived('buildGravatarURL')->with('myemail@google.com')->once();
    }

    public function testSrcGenerationWithCustomRating()
    {
        // Setup
        $api = m::spy('thomaswelton\GravatarLib\Gravatar');
        $gravatar = new Gravatar($api);

        // Act
        $gravatar->src('myemail@google.com', 150, 'g');

        // Assert
        $api->shouldHaveReceived('setAvatarSize')->with(150)->once();
        $api->shouldHaveReceived('setMaxRating')->with('g')->once();
        $api->shouldHaveReceived('buildGravatarURL')->with('myemail@google.com')->once();
    }
}
