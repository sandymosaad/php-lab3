<table width=100% border=1px solid>
    <tr>
        <th>
            Username
        </th>
        <th>
            Password
        </th>
        <th>
            Firstname
        </th>
        <th>
            Lastname
        </th>
        <th>
            Country
        </th>
        <th>
            Address
        </th>
        <th>
            Gender
        </th>
        <th>
            Skills
        </th>
        <th>
            Department
        </th>
        <th>
            profile picture
        </th>
        <th>
            More About Data
        </th>
    </tr>
    <?php
try
{
    $resource=fopen('traineedata.txt','r');
    while(!feof($resource))
    {
        $data=fgets($resource);
        $data=preg_split('/\,/',$data); 
        ?>
    <tr>
        <td><?php echo $data[0]; ?></td>
        <td><?php echo $data[1]; ?></td>
        <td><?php echo $data[2]; ?></td>
        <td><?php echo $data[3]; ?></td>
        <td><?php echo $data[4]; ?></td>
        <td><?php echo $data[5]; ?></td>
        <td><?php echo $data[6]; ?></td>
        <td><?php echo $data[7]; ?></td>
        <td><?php echo $data[8]; ?></td>
        <td>
            <?php if (!empty($data[9])): ?>
            <img src="uploads/<?php echo htmlspecialchars($data[9]); ?>" alt="Profile Picture"
                style="max-width: 100px;">
            <?php endif; ?>
        </td>


        <td>
            <button>Delete</button>
            <button>Update</button>
            <button>Show data</button>
        </td>
    </tr>

    <?php
    }
    fclose($resource);
}
catch(Exception $ex)
{
    echo 'error';
}
?>
</table>