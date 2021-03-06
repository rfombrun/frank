<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="category_id", type="integer")
     */
    private $category_id;
    

    /**
     * @var string
     *
     * @ORM\Column(name="ali_product_id", type="string", unique = true)
     */
    private $ali_product_id;

    /**
     * @var string
     *
     * @ORM\Column(name="ali_product_title", type="string")
     */
    private $ali_product_title;

    /**
     * @var string
     *
     * @ORM\Column(name="ali_product_url", type="string")
     */
    private $ali_product_url;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ali_sale_price", type="smallint")
     */
    private $ali_sale_price;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ali_30_days_commission", type="string")
     */
    private $ali_30_days_commission;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ali_volume", type="string")
     */
    private $ali_volume;

    /**
     * @var string
     *
     * @ORM\Column(name="ali_category_id", type="string")
     */
    private $ali_category_id;

   /**
     * @var string
     *
     * @ORM\Column(name="ali_affiliate_url", type="string")
     */
    private $ali_affiliate_url;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="products")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $category;

    /**
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="product")
     */
    protected $photos;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_review_pages", type="integer")
     */
    private $num_review_pages;

    /**
     * @var integer
     *
     * @ORM\Column(name="num_reviews", type="integer")
     */
    private $num_reviews;

    /**
     * @var integer
     *
     * @ORM\Column(name="date_last_crawled", type="integer")
     */
    private $date_last_crawled;   

    /**
     * @var integer
     *
     * @ORM\Column(name="date_of_latest_review", type="integer")
     */
    private $date_of_latest_review;   

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
     * Set categoryId
     *
     * @param integer $categoryId
     *
     * @return Product
     */
    public function setCategoryId($categoryId)
    {
        $this->category_id = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return integer
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Set aliProductId
     *
     * @param string $aliProductId
     *
     * @return Product
     */
    public function setAliProductId($aliProductId)
    {
        $this->ali_product_id = $aliProductId;

        return $this;
    }

    /**
     * Get aliProductId
     *
     * @return string
     */
    public function getAliProductId()
    {
        return $this->ali_product_id;
    }

    /**
     * Set aliProductTitle
     *
     * @param string $aliProductTitle
     *
     * @return Product
     */
    public function setAliProductTitle($aliProductTitle)
    {
        $this->ali_product_title = $aliProductTitle;

        return $this;
    }

    /**
     * Get aliProductTitle
     *
     * @return string
     */
    public function getAliProductTitle()
    {
        return $this->ali_product_title;
    }

    /**
     * Set aliProductUrl
     *
     * @param string $aliProductUrl
     *
     * @return Product
     */
    public function setAliProductUrl($aliProductUrl)
    {
        $this->ali_product_url = $aliProductUrl;

        return $this;
    }

    /**
     * Get aliProductUrl
     *
     * @return string
     */
    public function getAliProductUrl()
    {
        return $this->ali_product_url;
    }

    /**
     * Set aliSalePrice
     *
     * @param string $aliSalePrice
     *
     * @return Product
     */
    public function setAliSalePrice($aliSalePrice)
    {
        $this->ali_sale_price = round(floatval(substr($aliSalePrice, 4)));

        return $this;
    }

    /**
     * Get aliSalePrice
     *
     * @return string
     */
    public function getAliSalePrice()
    {
        return $this->ali_sale_price;
    }

    /**
     * Set ali30DaysCommission
     *
     * @param string $ali30DaysCommission
     *
     * @return Product
     */
    public function setAli30DaysCommission($ali30DaysCommission)
    {
        $this->ali_30_days_commission = $ali30DaysCommission;

        return $this;
    }

    /**
     * Get ali30DaysCommission
     *
     * @return string
     */
    public function getAli30DaysCommission()
    {
        return $this->ali_30_days_commission;
    }

    /**
     * Set aliVolume
     *
     * @param string $aliVolume
     *
     * @return Product
     */
    public function setAliVolume($aliVolume)
    {
        $this->ali_volume = $aliVolume;

        return $this;
    }

    /**
     * Get aliVolume
     *
     * @return string
     */
    public function getAliVolume()
    {
        return $this->ali_volume;
    }

    /**
     * Set aliCategoryId
     *
     * @param string $aliCategoryId
     *
     * @return Product
     */
    public function setAliCategoryId($aliCategoryId)
    {
        $this->ali_category_id = $aliCategoryId;

        return $this;
    }

    /**
     * Get aliCategoryId
     *
     * @return string
     */
    public function getAliCategoryId()
    {
        return $this->ali_category_id;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Product
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set aliAffiliateUrl
     *
     * @param string $aliAffiliateUrl
     *
     * @return Product
     */
    public function setAliAffiliateUrl($aliAffiliateUrl)
    {
        $this->ali_affiliate_url = $aliAffiliateUrl;

        return $this;
    }

    /**
     * Get aliAffiliateUrl
     *
     * @return string
     */
    public function getAliAffiliateUrl()
    {
        return $this->ali_affiliate_url;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add photo
     *
     * @param \AppBundle\Entity\Photo $photo
     *
     * @return Product
     */
    public function addPhoto(\AppBundle\Entity\Photo $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \AppBundle\Entity\Photo $photo
     */
    public function removePhoto(\AppBundle\Entity\Photo $photo)
    {
        $this->photos->removeElement($photo);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set numReviewPages
     *
     * @param integer $numReviewPages
     *
     * @return Product
     */
    public function setNumReviewPages($numReviewPages)
    {
        $this->num_review_pages = $numReviewPages;

        return $this;
    }

    /**
     * Get numReviewPages
     *
     * @return integer
     */
    public function getNumReviewPages()
    {
        return $this->num_review_pages;
    }

    /**
     * Set numReviews
     *
     * @param integer $numReviews
     *
     * @return Product
     */
    public function setNumReviews($numReviews)
    {
        $this->num_reviews = $numReviews;

        return $this;
    }

    /**
     * Get numReviews
     *
     * @return integer
     */
    public function getNumReviews()
    {
        return $this->num_reviews;
    }

    /**
     * Set dateOfLatestReview
     *
     * @param integer $dateOfLatestReview
     *
     * @return Product
     */
    public function setDateOfLatestReview($dateOfLatestReview)
    {
        $this->date_of_latest_review = $dateOfLatestReview;

        return $this;
    }

    /**
     * Get dateOfLatestReview
     *
     * @return integer
     */
    public function getDateOfLatestReview()
    {
        return $this->date_of_latest_review;
    }



    /**
     * Set dateLastCrawled
     *
     * @param integer $dateLastCrawled
     *
     * @return Product
     */
    public function setDateLastCrawled($dateLastCrawled)
    {
        $this->date_last_crawled = $dateLastCrawled;

        return $this;
    }

    /**
     * Get dateLastCrawled
     *
     * @return integer
     */
    public function getDateLastCrawled()
    {
        return $this->date_last_crawled;
    }

    /**
     * Check if the product has newer reviews on aliexpress.com 
     * that we haven't yet scraped through 
     *
     * @return boolean
     */
    public function needsScrape($dateOfLatestReviewOnAli)
    {
        // Is the most recent review uploaded to aliexpress newer than the latest review in the db?
        // both dates are unix timestamps
        if($dateOfLatestReviewOnAli > $this->date_of_latest_review)
            return true;

        return false;
    }
}
