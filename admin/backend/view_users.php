<div class="container-fluid">
          <?php

             $user_msg = new User();

             $user_msg->display_message();

           ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">All Users</h1>
         <div class="table-responsive-sm">
          <table class="table table-striped table-condensed table-bordered">
             
               <thead>
                  <tr>
                    <th>Sn</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Reg_Date</th>
                    <th>Updated_Date</th>
                    <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                    
                    $users = User::find_all();
                    $sn =0;
                    foreach($users as $user){
                       $sn +=1;
                      ?>
                        
                        <tr>
                            <td><?php echo $sn; ?></td>
                            <td><?php echo $user->name ?></td>
                            <td><?php echo $user->email ?></td>
                            <td>

                             <?php  
                                $the_date = User::modified_date($user->reg_date);
                               ?>
                               
                             </td>
                             <td>

                              <?php  
                                 $the_update_date = User::modified_date($user->updated_date);
                                ?>
                                
                              </td>
                             <td>
                               <a href="index.php?edit_user&edit_id=<?php echo $user->id ?>"><i class="text-success fa fa-edit"></i></a> &nbsp; &nbsp; &nbsp; | &nbsp; &nbsp; &nbsp;
                               <a onclick="javascript: return confirm('Do you want to delete?')" href="index.php?delete_user&id=<?php echo $user->id ?>"><i class="text-danger fa fa-trash"></i></a>
                             </td>

                          </tr>

                      <?php
                    }

                   ?> 

               </tbody>
            
          </table>
   </div>
          <!-- DataTales Example -->
        

        </div>