<?php
/**
 * BG reminder mail body
 * This will execute from command mode,
 * PHP full tag must be used user '<?php' instead of '<?'
 * Normal direct assignment tags '<?=' will work normaly
 */

// Check and prepare mail body
if($bg_data) {
    ?>
    <div>
        Hi,<br/>
        The following Bank guarantees are expiring in 30 days.<br/>
    </div><br/>
    <table class="table table-sm" cellspacing="0" cellpadding="5" border="1">
        <thead>
            <tr bgcolor="#E2E2E2">
                <th>S.No</th>
                <th>BG Number</th>
                <th>Bank</th>
                <th>Name of the party</th>
                <th>Amount</th>
                <th>Expires On</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sno = 1;
            foreach($bg_data as $bg) {
                ?>
                <tr>
                    <td><?= $sno++ ?></td>
                    <td><?= $bg['bg_number'] ?></td>
                    <td><?= $bg['bg_bank'] ?></td>
                    <td><?= $bg['name'] ?></td>
                    <td><?= displayNumber($bg['bg_amount']) ?></td>
                    <td><?= displayDate($bg['valid_date']) ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <br/>
    <div>
        <small>&copy; <?= date('Y') ?> Invoice Tracking System.</small><br/>
        <small>This is system generated email, please do not replay.</small>
    </div>
    <?php
}
?>