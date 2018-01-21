
		<?php
        /**
        * Template part for displaying a Text and table.
        */
        ?>
<section 
	class="block text_and_table default-<?php the_sub_field( 'default_background' ); ?>">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
            <!-- Stuff goes here -->
            <div class="text_and_table--content">
                <!--follow this pattern for fields, that way their space is not allocated if the field is empty and we do not have weird empty markup everywhere-->

				<div class="intro">
					<?php if ( get_sub_field( 'heading' ) ): ?>
	                    <h3 class="text_and_table--title"> <?php the_sub_field( 'heading' ); ?></h3>
					<?php endif; ?>
	
					<?php if ( get_sub_field( 'copy' ) ): ?>
	                    <div class="copy"> <?php the_sub_field( 'copy' ); ?></div>
					<?php endif; ?>
				</div>

				<div class="table-wrapper">
					<?php $table = get_sub_field( 'table' ); 
					 if ( $table ) { 
					     echo '<table>'; 
					         if ( $table['header'] ) { 
					             echo '<thead><tr>'; 
					                 echo ''; 
					                     foreach ( $table['header'] as $th ) { 
					                         echo '<th>'; 
					                             echo $th['c']; 
					                         echo '</th>'; 
					                     } 
					                 echo '</tr>'; 
					             echo '</thead>'; 
					         } 
					
					         echo '<tbody>'; 
					             foreach ( $table['body'] as $tr ) { 
					                 echo '<tr>'; 
					                     foreach ( $tr as $td ) { 
					                         echo '<td>'.$td['c'].'</td>'; 
					                     } 
					                 echo '</tr>'; 
					             } 
					         echo '</tbody>'; 
					     echo '</table>'; 
					 } ?>
				</div>

            </div>
        </div>
    </div>
</section>