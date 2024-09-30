<div class="nowDealCreationModal" style="height: auto;"> 
    <?php
    echo $this->Form->create
            (
            'Spectacle', array
        (
        'url' => array
            (
            'controller' => 'spectacles',
            'action' => 'generatePlaces',
        ),
        'inputDefaults' => array
            (
            'label' => false,
            'error' => false
        ),
                'id' => 'generatePlaces',
            )
    );
    ?> 
    <div id="salle0Td" width="250px"></div>
</form>
</div>