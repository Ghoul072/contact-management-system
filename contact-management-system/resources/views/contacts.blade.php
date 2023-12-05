
                    <table>
                        @foreach ($contacts->all() as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->address}}</td>
                            </tr>
                        @endforeach
                    </table>
                    <a href="{{ route('contacts.create') }}">Add a new contact</a>
                </div>