<p>
    Hola, {{ $allowedStudent['student']->name }} {{ $allowedStudent['student']->last_name }}
</p>
<p>Éste es tu código para poder postularte a un requerimiento(item) de una convocatoria,
    ten en cuenta que solo podrás usarlo para <strong>UN</strong> requerimieto al que quieras postular.
</p>
<div style="background:#DAD2D0; height: 100px; width: 400px; font-size: 30px; margin: 0; padding: 0; ">
    <p style="background: #DAD2D0; color: black; border: none; text-align: center; padding: 20px;">
        {{ $allowedStudent->postulation_code }}
    </p>
</div>
<p>Saludos,</p>
<p>Secretaria, Convocatoria Auxiliares</p>
