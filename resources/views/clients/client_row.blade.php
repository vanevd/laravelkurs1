            <tr id="tr_{{ $client->id }}">
                <td>{{ $client->id }}</td>
                <td class="first_name">{{ $client->first_name }}</td>
                <td class="last_name">{{ $client->last_name }}</td>
                <td class="phone">{{ $client->phone }}</td>
                <td class="email">{{ $client->email }}</td>
                <td><a  class="btn btn-primary btn-xs" href='#' onclick="delete_client({{ $client->id }})">delete</a></td>
                <td><a class="btn btn-primary btn-xs edit" href="#" onclick="edit_client({{ $client->id }})">edit</a></td>
            </tr>
            <tr id="tr_edit_{{ $client->id }}" style="display:none">
                <td>{{ $client->id }}</td>
                <td><input class="form-control first_name" type="text" value="{{$client->first_name}}"></td>
                <td><input class="form-control last_name" type="text" value="{{$client->last_name}}"></td>
                <td><input class="form-control phone" type="text" value="{{$client->phone}}"></td>
                <td><input class="form-control email" type="text" value="{{$client->email}}"></td>
                <td><a  class="btn btn-primary btn-xs" href='#' onclick="delete_client({{ $client->id }})">delete</a></td>
                <td><a class="btn btn-primary btn-xs update" href="#" onclick="update_client({{ $client->id }})">update</a></td>
            </tr>
