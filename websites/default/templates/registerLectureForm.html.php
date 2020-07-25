<div>
<h3>Register for <?=$students_on_lecture[0]['module_name']?> on 
<span><?=date_format(date_create($students_on_lecture[0]['lecture_start_date']),"Y/M/D H:i:s")?></span>
</h3>
        <?php
        $studentFormInput='';

            foreach ($students_on_lecture as $key=> $sl) {
                $div='
                    <div class="mt-1  d-flex row justify-content-around">
                        <input type="hidden" name="resgister'.$key.'[student_id]" value="'.$sl['student_id'] .'" />
                        <input type="hidden" name="resgister'.$key.'[lecture_id]" value="'.$sl['lecture_id'] .'" />
                        <label class="flex-fill ">'.$sl['Fname'].' '.$sl['Sname'].'</label>
                        <select class="flex-fill  " name="resgister'.$key.'[confirm]"">
                            <option value="yes" >Yes</option>
                            <option value="no" >No</option>
                        </select>
                    </div>
                    </br>
                ';
                $studentFormInput.=strval($div);
            }
            echo '
            <form action="" method="post" >
                '.$studentFormInput.'
                <input type="submit" class="mx-auto "  />
            </form>
            ';
        ?>


</div>

<script >
document.addEventListener("DOMContentLoaded",function() {
 var forms= document.querySelectorAll('#my-form')
//  console.log(forms[0]);
    // forms.forEach(form => {
    //     form.addEventListener("submit",function(e) {
    //     e.preventDefault(); // before the code
    //     /* do what you want with the form */

    //     // Should be triggered on form submit
    //   console.log('hi')
    //     });
    // });
//  .addEventListener("submit",function(e) {
//     e.preventDefault(); // before the code
//     /* do what you want with the form */

//     // Should be triggered on form submit
//     alert('hi');
//   });
});

</script>

<!--work on the submit form values for register -->