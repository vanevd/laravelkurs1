            <tr id="tr_{{ $product->id }}">
                <td>{{ $product->id }}</td>
                <td class="product_name">{{ $product->product_name }}</td>
                <td class="product_code">{{ $product->product_code }}</td>
                <td class="price">{{ $product->price }}</td>
                <td><a  class="btn btn-primary btn-xs" href='#' onclick="delete_product({{ $product->id }})">delete</a></td>
                <td><a class="btn btn-primary btn-xs edit" href="#" onclick="edit_product({{ $product->id }})">edit</a></td>
            </tr>
            <tr id="tr_edit_{{ $product->id }}" style="display:none">
                <td>{{ $product->id }}</td>
                <td><input class="form-control product_name" type="text" value="{{$product->product_name}}"></td>
                <td><input class="form-control product_code" type="text" value="{{$product->product_code}}"></td>
                <td><input class="form-control price" type="text" value="{{$product->price}}"></td>
                <td><a  class="btn btn-primary btn-xs" href='#' onclick="delete_product({{ $product->id }})">delete</a></td>
                <td><a class="btn btn-primary btn-xs update" href="#" onclick="update_product({{ $product->id }})">update</a></td>
            </tr>
