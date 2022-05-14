<x-layout>
<table>
    @foreach($posts as $post)
        <tr>
            <td>{{$post['id']}}</td>
            <td>{{$post['title']}}</td>
            <td>{{$post['slug']}}</td>
            <td>{{$post['likes']}}</td>
            <td>{{$post['created_at']}}</td>
        </tr>
    @endforeach
</table>
</x-layout>
