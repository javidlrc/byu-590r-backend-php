Hello manager.  Here is the list of overdue books and their users:

<table>
   <thead>
       <tr>
           <th>Name</th>
           <th>Description</th>
           <th>Favorite song</th>
       </tr>
   </thead>
   <tbody>
       @foreach ($artists as $artist)
       <tr>
           <td>{{ $artist->name }}</td>
           <td>{{ $artist->description }}</td>
           <td>{{ $artist->favoriteSong }}</td>
       </tr>   
       @endforeach
     
   </tbody>
</table>