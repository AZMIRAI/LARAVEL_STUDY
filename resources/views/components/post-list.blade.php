<div>

    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">작성일(현재기준)</th>
            <th scope="col">작성일(작성날짜)</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td><a href="{{ route('posts.show', ['post'=>$post->id]) }}">{{ $post->title }}</a></td>
                <td>{{$post->writer->name }}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->created_at}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $posts -> links() }}
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->


    {{--
        <h1> 僕の名前は{{ $name }}です～ </h1>
        @foreach ($posts as $post)
        <div class = "my-2">
            <p>
                 <h1> タイトル　「{{ $post -> title}}」 </h1>

                <h2> メイン内容　「{{ $post -> content }}」 </h2>

                 <h3> イメージ　「{{ $post -> image }}」 </h3>

                <h4> -----------------------------</h4>
            </p>
        </div>
    @endforeach --}}
</div>
