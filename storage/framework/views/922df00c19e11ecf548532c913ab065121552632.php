<html>
   <head>
      <style>
         table {
           font-family: arial, sans-serif;
           border-collapse: collapse;
           width: 100%;
         }
         
         td, th {           
           text-align: left;
           padding: 8px;
         }
         
         tr:nth-child(even) {
           background-color: #dddddd;
         }
         </style>
   </head>
   <body>
      <div style="background-color:#f8f8f8">

         <center><h1 style="padding: 30px 0; margin: 0px;"> <?php echo e(__('Your Weekly Roster.')); ?> </h1></center>
         
            <table width="100%">
               <thead>
                  <tr style=" background-color: #000;color: #fff; ">
                     <th></th>
                     <th ><?php echo e(__('Date')); ?></th>
                     <th ><?php echo e(__('Role')); ?></th>
                     <th ><?php echo e(__('Time')); ?></th>
                     <th ><?php echo e(__('Location')); ?></th>
                     <th ><?php echo e(__('Note')); ?></th>
                  </tr>
               </thead>
               <tbody>
                  
                  <?php if(!empty($rotas_data)): ?>
                     <?php $__currentLoopData = $rotas_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td> <?php echo e(++$key); ?></td>
                        <td> <?php echo e($data['rotas_date']); ?> </td>
                        <td> <?php echo e((!empty($role_datas[$data['role_id']])) ? $role_datas[$data['role_id']] : ''); ?> </td>
                        <td> <?php echo e($data['start_time'].' - '.$data['end_time']); ?> </td>
                        <td> <?php echo e((!empty($location_datas[$data['location_id']])) ? $location_datas[$data['location_id']] : ''); ?></td>
                        <td><?php echo e($data['note']); ?></td>
                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                  <?php else: ?>
                     <tr colspan="6">
                        <td align="center"><center> <h3><?php echo e(__('No shift available.')); ?> </h3> </center></td>
                     </tr>
                  <?php endif; ?>
                    <tr>
                        <td align="left" style="font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-right:50px;padding-bottom:0px;padding-left:50px;word-break:break-word">
                            <div style="font-family:Open Sans,Helvetica,Arial,sans-serif;font-size:13px;line-height:22px;text-align:left;color:#797e82">
                                <br>
                                <br>
                                <p style="margin:10px 0;text-align:center">For any technical assistance send Whatsapp message to <a href="https://wa.me/27827984237">+27 82 798 4237</a> or an email <a href="mailto:support@medtimes.co.za">support@medtimes.co.za</a>.</p>
                            </div>
                        </td>
                    </tr>
                  
               </tbody>
            </table>         
      </div>
   </body>
</html><?php /**PATH /home/jovickxe/medtimes.co/resources/views/email/sendrotas.blade.php ENDPATH**/ ?>