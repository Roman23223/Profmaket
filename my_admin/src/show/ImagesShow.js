import {Datagrid, ReferenceField, Show, SimpleShowLayout, TextField,} from "react-admin";
import React from "react";

const ImagesShow = (props) => {
    return (
        <Show {...props}>
            <SimpleShowLayout>
                <TextField source='name'/>
                <TextField source='path'/>
                <ReferenceField source='works' reference='works'>
                    <TextField source="id"/>
                </ReferenceField>
            </SimpleShowLayout>
        </Show>
    )
}

export default ImagesShow