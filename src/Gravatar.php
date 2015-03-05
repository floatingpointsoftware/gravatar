<?php
namespace FloatingPoint\Gravatar;

use thomaswelton\GravatarLib\Gravatar as EmberTar;

class Gravatar
{
    /**
     * Stores the URL location to the default image.
     */
    protected $defaultImage;

    /**
     * @param \emberlabs\GravatarLib\Gravatar $gravatar
     */
    public function __construct(EmberTar $gravatar)
    {
        $this->gravatar = $gravatar;
    }

    /**
     * Construct the src for the image from the gravatar servers.
     *
     * @param string $email
     * @param int $size
     * @param null|string $rating
     * @return string
     */
    public function src($email, $size = 100, $rating = null)
    {
        $this->gravatar->setAvatarSize($size);

        if (! is_null($rating)) {
            $this->gravatar->setMaxRating($rating);
        }

        return htmlentities($this->gravatar->buildGravatarURL($email));
    }

    /**
     * Checks to see whether an avatar for a given user exists or not.
     *
     * @param string $email
     * @return bool
     */
    public function exists($email)
	{
		$url = $this->gravatar->buildGravatarURL($email);
		$headers = get_headers($url, 1);

		return (boolean) strpos($headers[0], '200');
	}

    /**
     * Sets the default image to be used when no gravatar for a given email exists.
     *
     * @param string $image
     */
    public function setDefaultImage($image)
    {
        $this->defaultImage = $image;
    }
}
