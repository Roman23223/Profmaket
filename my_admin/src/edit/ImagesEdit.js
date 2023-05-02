import {Edit, ReferenceInput, SimpleForm, TextField, TextInput} from 'react-admin';
import React from "react";

const ImagesEdit = (props) => {
    return (
        <Edit {...props}>
            <SimpleForm>
                <ReferenceInput source='works' reference='works'>
                </ReferenceInput>
            </SimpleForm>
        </Edit>
    )
}

export default ImagesEdit