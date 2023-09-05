<html lang="en">
<head>
    <title><?= lang('appointment_reminder_title') ?></title>
</head>
<body style="font: 13px arial, helvetica, tahoma;">
<div class="email-container" style="width: 650px; border: 1px solid #eee;">
    <div id="header" style="background-color: #429a82; height: 45px; padding: 10px 15px;">
        <strong id="logo" style="color: white; font-size: 20px; margin-top: 10px; display: inline-block">
            <?= $company_name ?>
        </strong>
    </div>

    <div id="content" style="padding: 10px 15px;">
        <h2>Recordatorio</h2>
        A continuación, encontrará los detalles de su cita:
        <!-- <p><?= $email_message ?></p> -->

        <h2><?= lang('appointment_details_title') ?></h2>
        <table id="appointment-details">
            <!-- <tr>
                <td class="label" style="padding: 3px;font-weight: bold;"><?= lang('service') ?></td>
                <td style="padding: 3px;"><?= $appointment_service ?></td>
            </tr>
            <tr>
                <td class="label" style="padding: 3px;font-weight: bold;"><?= lang('provider') ?></td>
                <td style="padding: 3px;"><?= $appointment_provider ?></td>
            </tr> -->
            <tr>
                <td class="label" style="padding: 3px;font-weight: bold;">Fecha</td>
                <td style="padding: 3px;"><?= substr($appointment_start_date,0,11) ?></td>
            </tr>
            <tr>
                <td class="label" style="padding: 3px;font-weight: bold;">Horario</td>
                <td style="padding: 3px;"><?= substr($appointment_start_date,-8,8) ?></td>
            </tr>
            <tr>
                <td class="label" style="padding: 3px;font-weight: bold;">Lugar</td>
                <td style="padding: 3px;">Luis Thayer Ojeda 0180, Piso 3, Oficina 306, Providencia
(Santiago).</td>
            </tr>
            <tr>
                <td colspan="2" class="label mt-4" style="padding:3px"><b>¡IMPORTANTE!</b> Para ser atendido/a, debe llegar con 15 minutos de
anticipación y presentar su cédula de identidad.</td>
            </tr>
            <!-- <tr>
                <td class="label" style="padding: 3px;font-weight: bold;"><?= lang('end') ?></td>
                <td style="padding: 3px;"><?= $appointment_end_date ?></td>
            </tr> -->
            <!-- <tr>
                <td class="label" style="padding: 3px;font-weight: bold;"><?= lang('timezone') ?></td>
                <td style="padding: 3px;"><?= $appointment_timezone ?></td>
            </tr> -->
        </table>

        <h2><?= lang('customer_details_title') ?></h2>
        <table id="customer-details">
            <tr>
                <td class="label" style="padding: 3px;font-weight: bold;"><?= lang('name') ?></td>
                <td style="padding: 3px;"><?= $customer_name ?></td>
            </tr>
            <tr>
                <td class="label" style="padding: 3px;font-weight: bold;"><?= lang('email') ?></td>
                <td style="padding: 3px;"><?= $customer_email ?></td>
            </tr>
            <tr>
                <td class="label" style="padding: 3px;font-weight: bold;"><?= lang('phone_number') ?></td>
                <td style="padding: 3px;"><?= $customer_phone ?></td>
            </tr>
        </table>

        <h2><?= lang('appointment_link_title') ?></h2>
        <a href="<?= $appointment_link ?>" style="width: 600px;"><?= $appointment_link ?></a>
    </div>

    <div id="footer" style="padding: 10px; text-align: center; margin-top: 10px;
                border-top: 1px solid #EEE; background: #FAFAFA;">
        |
        <a href="<?= $company_link ?>" style="text-decoration: none;"><?= $company_name ?></a>
    </div>
</div>
</body>
</html>
