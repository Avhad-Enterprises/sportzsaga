<script src="<?= base_url(); ?>js/Categories.js"></script>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="<?= base_url(); ?>js/Product.js"></script>
<script>
  var accessToken = 'IGQWRPakY4bDY1bkZAwTWk3MXo4WjNDTC1qS25FdlZAuYktGV3VISUtuMnFSVkdKNFljU0tRRV8wd0FkWWpJVmgxN0g2cURxSjJ5dVFNcDdXX1NGUC01QW1nc2tEcm1uLS1CeHgzZAS1DMHZALZAWg4MEw2ZAlJKMlJsMGcZD';
  var apiEndpoint = 'https://graph.instagram.com/me/media?fields=id,media_url,permalink&access_token=' + accessToken;

  function fetchInstagramPosts() {
    $.ajax({
      url: apiEndpoint,
      dataType: 'jsonp',
      success: function(data) {
        if (data.data && data.data.length > 0) {
          var carouselContainer = $('#instagram-carousel');
          var carouselSlides = [];

          $.each(data.data, function(index, post) {
            var postCard = $('<div class="carousel-card"></div>');

            var postLink = $('<a></a>');
            postLink.attr('href', post.permalink);
            postLink.attr('target', '_blank');

            var postImage = $('<img>');
            postImage.attr('src', post.media_url);
            postImage.attr('alt', 'Instagram Post');

            var postDetails = $('<div class="post-details"></div>');

            var likesCount = $('<p><i class="fas fa-heart"></i></p>');
            var commentsCount = $('<p><i class="fas fa-comment"></i></p>');
            var shareCount = $('<p><i class="fas fa-share"></i></p>');

            postDetails.append(likesCount);
            postDetails.append(commentsCount);
            postDetails.append(shareCount);

            postLink.append(postImage);
            postCard.append(postLink);
            postCard.append(postDetails);

            carouselSlides.push(postCard);
          });

          carouselContainer.append(carouselSlides);

          carouselContainer.slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            arrows: true,
            responsive: [{
                breakpoint: 1024,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 1
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]
          });
        } else {
          console.log('No posts found.');
        }
      },
      error: function(error) {
        console.error('Error fetching Instagram posts:', error);
      }
    });
  }

  fetchInstagramPosts();
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const readMoreLinks = document.querySelectorAll('.readmore');

        readMoreLinks.forEach(link => {
            link.addEventListener('click', function() {
                const parentDiv = this.closest('.ad');
                const shortDesc = parentDiv.querySelector('.short-desc');
                const fullDesc = parentDiv.querySelector('.full-desc');

                if (fullDesc.style.display === 'none') {
                    fullDesc.style.display = 'block';
                    shortDesc.style.display = 'none';
                    this.textContent = 'Read Less';
                } else {
                    fullDesc.style.display = 'none';
                    shortDesc.style.display = 'block';
                    this.textContent = 'Read More';
                }
            });
        });
    });
</script>