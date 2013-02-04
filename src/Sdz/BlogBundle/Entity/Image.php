<?php 
namespace Sdz\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* Sdz\BlogBundle\Entity\Image
*
* @ORM\Table()
* @ORM\Entity(repositoryClass="Sdz\BlogBundle\Entity\ImageRepository")
*/
class Image
{
	/**
	* @var interger $id
	*
	* @ORM\Id
	* @ORM\Column(name="id", type="integer")
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

	/**
	* @var string $url
	*
	* @ORM\Column(name="url", type="string", length=255)
	*/
	protected $url;

	/**
	* @var string $alt
	*
	* @ORM\Column(name="alt", type="string", length=255)
	*/
	protected $alt;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Image
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;
    
        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }
}