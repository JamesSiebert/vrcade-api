import * as React from 'react';
import { useNavigate } from "react-router-dom";
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import IconButton from '@mui/material/IconButton';
import Typography from '@mui/material/Typography';
import Menu from '@mui/material/Menu';
import MenuIcon from '@mui/icons-material/Menu';
import Container from '@mui/material/Container';
import Avatar from '@mui/material/Avatar';
import Button from '@mui/material/Button';
import Tooltip from '@mui/material/Tooltip';
import MenuItem from '@mui/material/MenuItem';

const settings = ['Menu Coming Soon'];

const ResponsiveAppBar = () => {
    const [anchorElNav, setAnchorElNav] = React.useState(null);
    const [anchorElUser, setAnchorElUser] = React.useState(null);
    let navigate = useNavigate();

    const handleOpenNavMenu = (event) => {
        setAnchorElNav(event.currentTarget);
    };
    const handleOpenUserMenu = (event) => {
        setAnchorElUser(event.currentTarget);
    };

    const handleCloseNavMenu = () => {
        setAnchorElNav(null);
    };

    const handleCloseUserMenu = () => {
        setAnchorElUser(null);
    };

    const handleHomeClick = () => {
        handleCloseNavMenu()
        navigate("/");
    };

    const handleScoreClick = () => {
        handleCloseNavMenu()
        navigate("/scores-list");
    };

    const handleCreditClick = () => {
        handleCloseNavMenu()
        navigate("/credits-list");
    };

    const handleCheckinClick = () => {
        handleCloseNavMenu()
        navigate("/checkins-list");
    };
    const handleProjectInfoClick = () => {
        handleCloseNavMenu()
        navigate("/project-info");
    };

    return (
        <AppBar position="static">
            <Container maxWidth="xl">
                <Toolbar disableGutters>
                    <Typography
                        variant="h6"
                        noWrap
                        component="div"
                        sx={{ mr: 2, display: { xs: 'none', md: 'flex', fontSize: 24, fontWeight: 'medium' } }}
                    >
                        VRCADE API
                    </Typography>

                    <Box sx={{ flexGrow: 1, display: { xs: 'flex', md: 'none' } }}>
                        <IconButton
                            size="large"
                            aria-label="account of current user"
                            aria-controls="menu-appbar"
                            aria-haspopup="true"
                            onClick={handleOpenNavMenu}
                            color="inherit"
                        >
                            <MenuIcon />
                        </IconButton>
                        <Menu
                            id="menu-appbar"
                            anchorEl={anchorElNav}
                            anchorOrigin={{
                                vertical: 'bottom',
                                horizontal: 'left',
                            }}
                            keepMounted
                            transformOrigin={{
                                vertical: 'top',
                                horizontal: 'left',
                            }}
                            open={Boolean(anchorElNav)}
                            onClose={handleCloseNavMenu}
                            sx={{
                                display: { xs: 'block', md: 'none' },
                            }}
                        >
                            <MenuItem onClick={handleHomeClick}>
                                <Typography textAlign="center">Home</Typography>
                            </MenuItem>
                            <MenuItem onClick={handleScoreClick}>
                                <Typography textAlign="center">Scores</Typography>
                            </MenuItem>
                            <MenuItem onClick={handleCreditClick}>
                                <Typography textAlign="center">Credits</Typography>
                            </MenuItem>
                            <MenuItem onClick={handleCheckinClick}>
                                <Typography textAlign="center">CheckIns</Typography>
                            </MenuItem>
                            <MenuItem onClick={handleProjectInfoClick}>
                                <Typography textAlign="center">Project Info</Typography>
                            </MenuItem>
                        </Menu>
                    </Box>
                    <Typography
                        variant="h5"
                        noWrap
                        component="div"
                        sx={{ flexGrow: 1, display: { xs: 'flex', md: 'none' }, fontSize: 24, fontWeight: 'medium' }}
                    >
                        VRCADE API
                    </Typography>

                    <Box sx={{ flexGrow: 1, display: { xs: 'none', md: 'flex' } }}>
                        <Button onClick={handleHomeClick} sx={{ my: 2, color: 'white', display: 'block' }} >Home</Button>
                        <Button onClick={handleScoreClick} sx={{ my: 2, color: 'white', display: 'block' }} >Scores</Button>
                        <Button onClick={handleCreditClick} sx={{ my: 2, color: 'white', display: 'block' }} >Credit</Button>
                        <Button onClick={handleCheckinClick} sx={{ my: 2, color: 'white', display: 'block' }} >Check-Ins</Button>
                        <Button onClick={handleProjectInfoClick} sx={{ my: 2, color: 'white', display: 'block' }} >Project Info</Button>
                    </Box>

                    <Box sx={{ flexGrow: 0 }}>
                        <Tooltip title="Open settings">
                            <IconButton onClick={handleOpenUserMenu} sx={{ p: 0 }}>
                                <Avatar alt="API" src="/static/images/avatar/api.jpg" />
                            </IconButton>
                        </Tooltip>
                        <Menu
                            sx={{ mt: '45px' }}
                            id="menu-appbar"
                            anchorEl={anchorElUser}
                            anchorOrigin={{
                                vertical: 'top',
                                horizontal: 'right',
                            }}
                            keepMounted
                            transformOrigin={{
                                vertical: 'top',
                                horizontal: 'right',
                            }}
                            open={Boolean(anchorElUser)}
                            onClose={handleCloseUserMenu}
                        >
                            {settings.map((setting) => (
                                <MenuItem key={setting} onClick={handleCloseNavMenu}>
                                    <Typography textAlign="center">{setting}</Typography>
                                </MenuItem>
                            ))}
                        </Menu>
                    </Box>
                </Toolbar>
            </Container>
        </AppBar>
    );
};
export default ResponsiveAppBar;
