import React from 'react';
import { BottomNavigation, BottomNavigationAction } from '@mui/material';
import Paper from '@mui/material/Paper';
import Box from '@mui/material/Box';

function Footer(props) {
    return (

        <Box pt={15}>
            <Paper sx={{ position: 'fixed', bottom: 0, left: 0, right: 0,}} elevation={3}>
                <BottomNavigation showLabels >
                    <BottomNavigationAction label="VRCADE API by JamesSiebert.com" target="_blank" href="https://jamessiebert.com" sx={{ minWidth: 650 }}/>} />
                </BottomNavigation>
            </Paper>
        </Box>

    );
}

export default Footer;
