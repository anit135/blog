  <button type="button" class="btn btn-labeled p-0" style="
    font-size: inherit;
    font-family: inherit;
">
      <span class="btn-label" id="like"><i class="fa fa-regular fa-heart"></i></span></button>
  <label for="like" class="me-3" id="l_like">{{ $article->amount_likes ?? 0 }}</label>

  <i class="fa-solid fa-eye me-1" id="view"></i>
  <label for="view" id="l_view">{{ $article->amount_views ?? 0 }}</label>

  <script type="text/javascript">
      var flag = true,
          likeCount = $('#l_like').text();

      $('#like').click(function() {
          $.ajax({
              type: 'PUT',
              url: "{{ route('like_up', $article->id) }}",
              data: {
                  flag: flag,
                  _token: '{{csrf_token()}}'
              },
              success: function(data) {
                  $('#l_like').text(data.success);

                  if (flag) {
                      $('#like svg').removeClass('fa-regular');
                      $('#like svg').addClass('fa-solid');
                  } else {
                      $('#like svg').removeClass('fa-solid');
                      $('#like svg').addClass('fa-regular');
                  }

                  flag = !flag;
              },
              error: function(data, textStatus, errorThrown) {
                  console.log('error');
                  console.log(data.error);
              },
          });
      });

      function setCoutnViews() {
          $.ajax({
              type: 'PUT',
              url: "{{ route('view_up', $article->id) }}",
              data: {
                  _token: '{{csrf_token()}}'
              },
              success: function(data) {
                  $('#l_view').text(data.success);
              },
              error: function(data, textStatus, errorThrown) {
                  console.log('error');
                  console.log(data.error);
              },
          });
      }
      setTimeout(setCoutnViews, 5000);
  </script>