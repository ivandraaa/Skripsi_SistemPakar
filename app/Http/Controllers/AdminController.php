<?php

// AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Your existing methods

    /**
     * Show the add admin form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddAdminForm()
    {
        return view('admin.add_admin');
    }

    /**
     * Add a new admin or user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addAdmin(Request $request)
    {
        // Your logic to add admin or user goes here
        // You can use $request to get form data

        $role = $request->input('role');

        // Example: Creating a new admin or user
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $role,
            'password' => bcrypt($request->input('password')),
        ]);

        $successMessage = $role === 'admin' ? 'Admin added successfully.' : 'User added successfully.';

        return redirect('/dashboard/admin')->with('success', $successMessage);
    }

    /**
     * Show the list of admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAdmins()
    {
        $users = User::where('role', 'admin')->get();

        return view('admin.list_admin', ['user' => $users]);
    }

    /**
     * Delete admin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAdmin($id)
    {
        // Your logic to delete admin goes here
        // Example: Deleting an admin
        $admin = User::find($id);
        if (!$admin) {
            return redirect('/dashboard/admin')->with('error', 'Admin not found.');
        }

        $role = $admin->role;
        $admin->delete();

        $successMessage = $role === 'admin' ? 'Admin deleted successfully.' : 'User deleted successfully.';

        return redirect('/dashboard/admin')->with('success', $successMessage);
    }
}
