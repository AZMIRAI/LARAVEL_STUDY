<div class = "container">
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    {{-- {{$post}} --}}
    <div class="card" style="width: 100%; margin:10px">
        @if ($post->image)
        <img src="{{'/storage/images/'.$post->image}}" class="card-img-top" alt="..." width="20">
        @else
            <span>첨부 이미지 없음</span>
        @endif
        <div class="card-body">
          <h5 class="card-title">제목 : {{$post->title}}</h5>
          <p class="card-text">내용 : {{$post->content}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">작성자 : {{$post->writer->name}}</li>
          <li class="list-group-item">등록일 : {{$post->created_at->diffForHumans()}}</li>
          <li class="list-group-item">수정일 : {{$post->updated_at}}</li>
        </ul>
        <div class="card-body flex">
            {{-- <input type="text" id = "myInput" > --}}
            <a href="{{ route('posts.edit', ['post'=>$post->id]) }}" class="card-link">수정</a>
            <form id="form" class="ml-4" method="post" onsubmit="e.preventDefault(); confirmDelete(event)" action="{{ route('posts.destroy', ['post'=>$post->id]) }}">
              @csrf
              @method('delete')
              {{-- <input name="_method" value="delete" type="hidden"> --}}
              <button onclick="return confirmDelete()" type="submit" >삭제</button>
            </form>

          </div>
        </div>
      </div>



      <script>
        function confirmDelete(e){
            myform = document.getElementById('form');
            flag = confirm('정말 삭제 하겠습니까?');
            if (flag){
                // 서브밋...
                myform.submit();
            }
            // e.preventDefault();
            // e.preventDefault(); // form이 서버로 전달 되는 것을 막아줌
            // document.getElementById('form');
            return false;
        }
       </script>
</div>
