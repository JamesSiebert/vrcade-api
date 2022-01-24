import React, { useContext, useEffect } from 'react';
import { AppContext } from './App';
import ResponsiveAppBar from './ResponsiveAppBar';
import { Alert, Button, Grid, Table } from '@mui/material';
import Box from '@mui/material/Box';
import TableBody from '@mui/material/TableBody';
import TableCell from '@mui/material/TableCell';
import TableContainer from '@mui/material/TableContainer';
import TableHead from '@mui/material/TableHead';
import TableRow from '@mui/material/TableRow';
import Paper from '@mui/material/Paper';
import Footer from './Footer';

const CheckinsList = ({ checkins }) => {
    const { handleGetCheckins } = useContext(AppContext);

    useEffect(() => {
        handleGetCheckins();
    }, []);

    const table =
        <Box sx={{ pt: 2 }}>
            <TableContainer component={Paper}>
                <Table sx={{ minWidth: 650 }} aria-label=" scores table">
                    <TableHead >
                        <TableRow>
                            <TableCell sx={{ color: 'text.secondary', fontSize: 24, fontWeight: 'medium' }} >ID</TableCell>
                            <TableCell sx={{ color: 'text.secondary', fontSize: 24, fontWeight: 'medium' }} align="left"> Player ID</TableCell>
                            <TableCell sx={{ color: 'text.secondary', fontSize: 24, fontWeight: 'medium' }} align="left">Room ID</TableCell>
                            <TableCell sx={{ color: 'text.secondary', fontSize: 24, fontWeight: 'medium' }} align="left">Date Time</TableCell>
                        </TableRow>
                    </TableHead>
                    <TableBody classes={{ root: 'table-body' }}>
                        {checkins.map((row) => (
                            <TableRow key={row.id} sx={{ '&:last-child td, &:last-child th': { border: 0 } }} >
                                <TableCell component="th" scope="row">{row.id}</TableCell>
                                <TableCell align="left">{row.player_id}</TableCell>
                                <TableCell align="left">{row.room_id}</TableCell>
                                <TableCell align="left">{row.created_at}</TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>
            </TableContainer>
        </Box>
    ;

    const downloadButton =
        <Button variant="outlined" href={'/scores_export'}>DOWNLOAD XLSX</Button>
    ;

    return (
        <>
            <ResponsiveAppBar />
            <Grid container spacing={2} sx={{ pt: 2}}>
                <Grid item xs={0} md={2} />
                <Grid item xs={12} md={8}>
                    <Alert severity="info">A check-in is a ping from the VRCADE Unity game.<br />
                        Each player pings this API every minute they are in the game.<br />
                        These Check-Ins are used to deduct account credits.
                    </Alert>
                    <br />
                    {downloadButton}
                    {table}
                </Grid>
                <Grid item xs={0} md={2} />
            </Grid>
            <Footer />
        </>
    );
};

export default CheckinsList;
