<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
    <h1> 僕の名前は{{ $name }}です～ </h1>
    @foreach ($posts as $post)
        <div class = "my-2">
            <p>
                {{-- <h1> タイトル　「{{ $post -> title}}」 </h1> --}}

                <h2> メイン内容　「{{ $post -> content }}」 </h2>

                {{-- <h3> イメージ　「{{ $post -> image }}」 </h3> --}}

                {{-- <h4> -----------------------------</h4> --}}
            </p>
        </div>
    @endforeach
</div>
