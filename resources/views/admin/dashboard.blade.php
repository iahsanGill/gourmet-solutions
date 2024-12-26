@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="dashboard-container">
        <!-- User Profile Section -->
        <div class="user-profile-section">
            <h2>Welcome, {{ Auth::user()->name }}!</h2>
            <div class="user-description">
                <p>{{ Auth::user()->description ?? 'No description provided yet.' }}</p>
                <button class="btn-edit" onclick="openDescriptionModal()">Edit Description</button>
            </div>
        </div>

        <!-- Lunch Boxes Section -->
        <section>
            <div class="section-header">
                <h3>Your Lunch Boxes</h3>
                <button class="btn-add" onclick="openAddModal()">Add New Lunch Box</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Lunch Box</th>
                        <th>Price (PKR)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lunchboxes as $lunchbox)
                        <tr>
                            <td>{{ $lunchbox->name }}</td>
                            <td>{{ $lunchbox->price }}</td>
                            <td>
                                <button class="btn-edit" onclick="editLunchBox('{{ $lunchbox->id }}')">Edit</button>
                                <form action="{{ route('admin.lunchboxes.delete', $lunchbox->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No lunch boxes available yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>

        <!-- Orders Section -->
        <section>
            <div class="section-header">
                <h3>Your Received Orders</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <th>Lunch Box</th>
                        <th>Delivery Address</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->contact_number }}</td>
                            <td>{{ $order->lunchbox->name }}</td>
                            <td>{{ $order->delivery_address }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No orders received yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>

        <!-- Description Modal -->
        <div id="descriptionModal" class="modal">
            <div class="modal-content">
                <button class="modal-close" onclick="closeDescriptionModal()">&times;</button>
                <h2>Edit Description</h2>
                <form action="{{ route('admin.update.description') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" rows="4">{{ Auth::user()->description }}</textarea>
                    </div>
                    <button type="submit" class="btn-submit">Update Description</button>
                </form>
            </div>
        </div>

            <!-- Add Lunch Box Modal -->
        <div id="addLunchBoxModal" class="modal">
            <div class="modal-content">
                <button class="modal-close" onclick="this.parentElement.parentElement.style.display='none'">&times;</button>
                <h2>Add New Lunch Box</h2>
                <form action="{{ route('admin.lunchboxes.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" required>
                    </div>
                    <div class="form-group">
                        <label for="ingredients">Ingredients:</label>
                        <textarea name="ingredients" id="ingredients"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nutritional_info">Nutritional Info:</label>
                        <textarea name="nutritional_info" id="nutritional_info"></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="is_available" id="is_available" value="1">
                            Available
                        </label>
                    </div>
                    <button type="submit" class="btn-submit">Add Lunch Box</button>
                </form>
            </div>
        </div>

        <!-- Edit Lunch Box Modal -->
        <div id="editLunchBoxModal" class="modal">
            <div class="modal-content">
                <button class="modal-close" onclick="this.parentElement.parentElement.style.display='none'">&times;</button>
                <h2>Edit Lunch Box</h2>
                <form id="edit_form" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="edit_name">Name:</label>
                        <input type="text" name="name" id="edit_name" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_price">Price:</label>
                        <input type="number" name="price" id="edit_price" required>
                    </div>
                    <div class="form-group">
                        <label for="edit_ingredients">Ingredients:</label>
                        <textarea name="ingredients" id="edit_ingredients"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="edit_nutritional_info">Nutritional Info:</label>
                        <textarea name="nutritional_info" id="edit_nutritional_info"></textarea>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="checkbox" name="is_available" id="edit_is_available" value="1">
                            Available
                        </label>
                    </div>
                    <button type="submit" class="btn-submit">Update Lunch Box</button>
                </form>
            </div>
        </div>
    </div>
@endsection
