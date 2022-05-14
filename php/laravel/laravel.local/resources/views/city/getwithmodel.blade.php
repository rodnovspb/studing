<x-layout>
    <table>
       @foreach($cities as $city)
           <tr>
               <td>{{$city['id']}}</td>
               <td>{{$city['city']}}</td>
           </tr>
        @endforeach
    </table>

</x-layout>
