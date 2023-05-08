<x-header/>

<div class="overflow-x-auto w-full">
    <table class="table w-full">
        <!-- head -->
        <thead>
        <tr>
            <th>
                <label>
                    <input type="checkbox" class="checkbox" />
                </label>
            </th>
            <th>Name</th>
            <th>Job</th>
            <th>Favorite Color</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <!-- row 1 -->
        <tr>
            <th>
                <label>
                    <input type="checkbox" class="checkbox" />
                </label>
            </th>
            <td>
                <div class="flex items-center space-x-3">
                    <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                            <img src="/tailwind-css-component-profile-2@56w.png" alt="Avatar Tailwind CSS Component" />
                        </div>
                    </div>
                    <div>
                        <div class="font-bold">Hart Hagerty</div>
                        <div class="text-sm opacity-50">United States</div>
                    </div>
                </div>
            </td>
            <td>
                Zemlak, Daniel and Leannon
                <br/>
                <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
            </td>
            <td>Purple</td>
            <th>
                <label for="my-modal-4" class="btn">MODIFIER</label>
            </th>
        </tr>
        <!-- row 2 -->
        <tr>
            <th>
                <label>
                    <input type="checkbox" class="checkbox" />
                </label>
            </th>
            <td>
                <div class="flex items-center space-x-3">
                    <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                            <img src="/tailwind-css-component-profile-3@56w.png" alt="Avatar Tailwind CSS Component" />
                        </div>
                    </div>
                    <div>
                        <div class="font-bold">Brice Swyre</div>
                        <div class="text-sm opacity-50">China</div>
                    </div>
                </div>
            </td>
            <td>
                Carroll Group
                <br/>
                <span class="badge badge-ghost badge-sm">Tax Accountant</span>
            </td>
            <td>Red</td>
            <th>
                <button class="btn btn-ghost btn-xs">Modifier</button>
            </th>
        </tr>
        <!-- row 3 -->
        <tr>
            <th>
                <label>
                    <input type="checkbox" class="checkbox" />
                </label>
            </th>
            <td>
                <div class="flex items-center space-x-3">
                    <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                            <img src="/tailwind-css-component-profile-4@56w.png" alt="Avatar Tailwind CSS Component" />
                        </div>
                    </div>
                    <div>
                        <div class="font-bold">Marjy Ferencz</div>
                        <div class="text-sm opacity-50">Russia</div>
                    </div>
                </div>
            </td>
            <td>
                Rowe-Schoen
                <br/>
                <span class="badge badge-ghost badge-sm">Office Assistant I</span>
            </td>
            <td>Crimson</td>
            <th>
                <button class="btn btn-ghost btn-xs">Modifier</button>
            </th>
        </tr>
        <!-- row 4 -->
        <tr>
            <th>
                <label>
                    <input type="checkbox" class="checkbox" />
                </label>
            </th>
            <td>
                <div class="flex items-center space-x-3">
                    <div class="avatar">
                        <div class="mask mask-squircle w-12 h-12">
                            <img src="/tailwind-css-component-profile-5@56w.png" alt="Avatar Tailwind CSS Component" />
                        </div>
                    </div>
                    <div>
                        <div class="font-bold">Yancy Tear</div>
                        <div class="text-sm opacity-50">Brazil</div>
                    </div>
                </div>
            </td>
            <td>
                Wyman-Ledner
                <br/>
                <span class="badge badge-ghost badge-sm">Community Outreach Specialist</span>
            </td>
            <td>Indigo</td>
            <th>
                <button class="btn btn-ghost btn-xs">Modifier</button>
            </th>
        </tr>
        </tbody>
        <!-- foot -->
        <tfoot>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Job</th>
            <th>Favorite Color</th>
            <th></th>
        </tr>
        </tfoot>

    </table>
</div>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal-4" class="modal-toggle" />
<label for="my-modal-4" class="modal cursor-pointer">
    <label class="modal-box relative" for="">
        <h3 class="font-bold text-lg">Modifier compte : </h3>
        <form method="PATCH" action="/modify">

            <input name="username" type="text" placeholder="Identifiant" class="input input-bordered w-full max-w-xs">

            <button type="submit" class="btn btn-ghost">Modifier</button>
        </form>
        <div class="modal-action">
            <label for="" class="btn">Bannir</label>
        </div>
        <div class="modal-action">
            <label for="" class="btn">Reset mot de passe</label>
        </div>
        <div class="modal-action">
            <label for="" class="btn">Reset image</label>
        </div>
    </label>
</label>

<x_footer/>
