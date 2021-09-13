<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Admin</title>
</head>
<body>
     <?php include('process.php'); ?>
     <h1 class="text-center text-2xl font-extrabold p-10 uppercase">for verification</h1>
    <div class="flex justify-center">
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <input type="text" class="p-1 rounded focus:outline-none border-2 focus:border-blue-300 border-gray-400" placeholder="Name" name="name">
            <input type="text" class="p-1 rounded focus:outline-none border-2 focus:border-blue-300 border-gray-400" placeholder="Course&Year" name="cyear">
            <input type="text" class="p-1 rounded focus:outline-none border-2 focus:border-blue-300 border-gray-400" placeholder="Student ID" name="studentId">
            <input type="email" class="p-1 rounded focus:outline-none border-2 focus:border-blue-300 border-gray-400" placeholder="BU Email" name="buEmail">
            <!-- <input type="file"> -->
            <button type="submit" name="signup" class="bg-blue-300 p-2 rounded">Signup</button>
        </form>
    </div>
    <div>
        <div class="flex justify-center items-center text-2xl p-4 font-extrabold">
             <h1 >Verify User</h1>
             <div class="relative">
                 <img src="./pngegg.png" alt="" style="width: 37px">
                 <div class=" absolute bottom-4 right-0 bg-red-400 rounded-full flex justify-center items-center text-white"
                  style="width: 18px; height: 18px; font-size: 12px">
                   <?php echo $num_rows?>
                 </div>
             </div>
        </div>
            <div class="flex flex-col mx-auto" style="width: 1100px;">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            year
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            BU Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <form action="process.php" method="POST">
                            <?php while ($row = mysqli_fetch_array($results)) { ?>
                                    <tr>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <td>
                                             <input type="text" name="name" value="<?php echo $row['name']; ?>" class="bg-transparent pl-6 focus:outline-none" readonly >
                                        </td>
                                        <td>
                                              <input type="text" name="cyear" value="<?php echo $row['cyear']; ?>" class="bg-transparent pl-6 focus:outline-none" readonly>
                                        </td>
                                        <td>
                                              <input type="text" name="studentId" value="<?php echo $row['studentId']; ?>" class="bg-transparent pl-6 focus:outline-none"readonly >
                                        </td>
                                        <td>
                                              <input type="text" name="buEmail" value="<?php echo $row['buEmail']; ?>" class="bg-transparent pl-6 focus:outline-none"readonly >
                                        </td>
                                        <td>
                                                <a href="index.php?decline=<?php echo $row['id']; ?>"
                                                   class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-200 text-green-800">Decline</a>
                                                <button type="submit" name="verify" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Verify</button>
                                        </td>
                                    </tr>
                            <?php } ?>
                        </form>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
   
        <h1 class="text-center text-2xl p-4 font-extrabold">Verified User</h1>
        <div class="flex flex-col mx-auto" style="width: 1100px;">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            year
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            id
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            BU Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                            <?php while ($row = mysqli_fetch_array($verified)) { ?>
                                  <tr>
                                        <td>
                                            <p class="pl-6"><?php echo $row['name']; ?></p>
                                        </td>
                                        <td>
                                            <p class="pl-6"><?php echo $row['cyear']; ?></p>
                                        </td>
                                        <td>
                                             <p class="pl-6"><?php echo $row['studentId']; ?></p>
                                        </td>
                                        <td>
                                             <p class="pl-6"><?php echo $row['buEmail']; ?></p>
                                        </td>
                                        <td>
                                            <span class="px-2 ml-3 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                              VERIFIED
                                            </span>
                                        </td>
                                    
                                    </tr>
                            <?php } ?>
                    </tbody>
                    </table>
                 </div>
                </div>
             </div>
        </div>
    </div>
</body>
</html>